import React, { useState, useEffect } from 'react'
import { Alert, BackHandler, View, Text, SafeAreaView, ScrollView, StatusBar, TouchableOpacity, ActivityIndicator, ToastAndroid } from 'react-native'
import { useNavigation, useRoute, useFocusEffect } from '@react-navigation/native';

import Axios from 'axios';
import values from '../values';

// Components
import Carousel from '../components/Carousel'
import MenuItem from '../components/MenuItem'
import NewsItem from '../components/NewsItem'

// Images
import Paper from '../assets/icons/paper.svg'
import Tie from '../assets/icons/tie.svg'
import Gavel from '../assets/icons/gavel.svg'

const Home = (props) => {
    const [carouselData, setCarouselData] = useState([]);
    const [newsItem, setNewsItem] = useState([]);
    const [loading, setLoading] = useState(true);
    const navigation = useNavigation();
    const routes = values.routes;

    // didMount
    useEffect(() => {
        // Carousel
        Axios.get(routes.host + routes.carousel)
            .then(result => {

                setLoading(false);

                if (result.status == 200) {
                    setCarouselData(result.data);
                } else {
                    alert('Gagal mengambil data');
                }

            })
            .catch(err => {
                console.log(routes.host + routes.carousel)
                alert('Error: ');
            })

        // News item
        Axios.get(routes.host + routes.news + "?limit=5")
            .then(result => {

                if (result.status == 200) {
                    setNewsItem(result.data);
                } else {
                    alert('Gagal mengambil data');
                }
            })
            .catch(err => {
                alert('Error: ' + err);
            })

    }, [])

    // willFocus
    useEffect(() => {
        const unsubscribe = navigation.addListener('focus', () => {
            BackHandler.addEventListener('hardwareBackPress', () => {
                Alert.alert(
                    'Keluar Aplikasi',
                    'Anda ingin keluar aplikasi?', [{
                        text: 'Batal',
                        style: 'cancel'
                    }, {
                        text: 'Ya',
                        onPress: () => BackHandler.exitApp()
                    },], {
                    cancelable: false
                }
                )
                return true;
            });
        });

        return unsubscribe;
    }, [navigation]);

    return (
        <SafeAreaView >
            <StatusBar barStyle="light-content" backgroundColor="#FF817C" />
            <ScrollView>
                <View>
                    {carouselData.length > 0 && <Carousel data={carouselData} />}

                    <View style={{ marginTop: 40, paddingLeft: 30, paddingRight: 30, flexDirection: 'row', justifyContent: 'space-between' }}>
                        <MenuItem url={routes.host + routes.perda} title="Peraturan Daerah" color="#F6A752" logo={Paper} />
                        <MenuItem url={routes.host + routes.perbup} title="Peraturan Bupati" color="#50CDFF" logo={Tie} />
                        <MenuItem url={routes.host + routes.sk} title="SK Bupati" color="#FF817C" logo={Gavel} />
                    </View>

                    <View style={{ alignItems: 'center', marginTop: 50, marginBottom: 10 }}>
                        <Text style={{ fontSize: 16, fontWeight: 'bold', color: '#908A8A' }}>INFORMASI</Text>
                        <View
                            style={{
                                marginTop: 7,
                                width: 120,
                                borderBottomColor: '#FF817C',
                                borderBottomWidth: 2,
                            }}
                        />
                    </View>

                    <View>

                        {loading && <ActivityIndicator size="large" color="#50CDFF" />}

                        {newsItem.map((item) => {
                            return (
                                <NewsItem
                                    key={'key' + Math.random()}
                                    data={item}
                                />
                            )
                        })}

                        <TouchableOpacity
                            onPress={() => navigation.navigate("NewsList", {
                                headerTitle: 'Informasi'
                            })}
                            style={{ alignItems: 'center', marginTop: 30, marginBottom: 50 }}>
                            <Text style={{ color: '#50CDFF' }}>Tampilkan lebih banyak</Text>
                        </TouchableOpacity>
                    </View>
                </View>
            </ScrollView>
        </SafeAreaView>
    )
}

export default Home