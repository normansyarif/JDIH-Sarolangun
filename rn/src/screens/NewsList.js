import React, { useState, useEffect } from 'react'
import {Text, ImageBackground, BackHandler, View, SafeAreaView, ScrollView, StatusBar, ActivityIndicator } from 'react-native'
import { useNavigation, useRoute } from '@react-navigation/native';

import values from '../values';

import Axios from 'axios';

import NewsItem from '../components/NewsItem'


const NewsList = (props) => {
    const navigation = useNavigation();
    const route = useRoute();

    const [newsItem, setNewsItem] = useState([]);
    const [loading, setLoading] = useState(true);

    const { headerTitle } = route.params;

    useEffect(() => {
        navigation.setOptions({
            headerTitle: headerTitle
        })

        const routes = values.routes;

        Axios.get(routes.host + routes.news)
            .then(result => {
                console.log(result);

                if (result.status == 200) {
                    setNewsItem(result.data);
                    setLoading(false);
                } else {
                    alert('Gagal mengambil data');
                }
            })
            .catch(err => {
                alert('Error: ' + err);
            })

        BackHandler.addEventListener('hardwareBackPress', () => {
            navigation.goBack()
            return true;
        });
    }, []);

    return (
        <SafeAreaView style={{ flex: 1 }}>
            <ImageBackground style={{ flex: 1 }}
                resizeMode='cover'
                source={require('./../assets/images/bg.jpg')}>
                
                <StatusBar barStyle="light-content" backgroundColor="#182533" />
                <ScrollView>
                    <View>

                        {newsItem.map((item) => {
                            return (
                                <NewsItem
                                    key={'key' + Math.random()}
                                    data={item}
                                />
                            )
                        })}

                        {loading && <ActivityIndicator style={{ marginTop: 100 }} size="large" color="#50CDFF" />}

                    </View>
                </ScrollView>
            </ImageBackground>
        </SafeAreaView>

    )
}


export default NewsList