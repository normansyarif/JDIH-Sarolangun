import React, { useState, useEffect } from 'react'
import { View, Text, SafeAreaView, ScrollView, StatusBar, TouchableOpacity, ActivityIndicator, StyleSheet } from 'react-native'
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
    }, []);

    return (
        <SafeAreaView >
            <StatusBar barStyle="light-content" backgroundColor="#FF817C" />
            <ScrollView>
                <View>
                    <View>

                        {loading && <ActivityIndicator style={styles.loading} size="large" color="#50CDFF" />}

                        {newsItem.map((item) => {
                            return (
                                <NewsItem
                                    key={'key' + Math.random()}
                                    data={item}
                                />
                            )
                        })}

                    </View>
                </View>
            </ScrollView>
        </SafeAreaView>

    )
}

const styles = StyleSheet.create({
    loading: {
        position: 'absolute',
        left: 0,
        right: 0,
        top: 0,
        bottom: 0,
        alignItems: 'center',
        justifyContent: 'center'
    }
})


export default NewsList