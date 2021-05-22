import React from 'react'
import {View, StyleSheet, Text, Image, Dimensions, TouchableOpacity } from 'react-native'
import { useNavigation, useRoute } from '@react-navigation/native';

import Clock from '../assets/icons/clock.svg'

const { width, height } = Dimensions.get('window')

const NewsItem = (props) => {
    const navigation = useNavigation();

    console.log('yooo => ' + props.data.image)

    return (
        <TouchableOpacity
            onPress={() => navigation.navigate("Browser", {
                headerTitle: 'Informasi',
                url: props.data.url
            })}
            style={styles.cardView}>
            <View style={{ flexDirection: 'row' }}>
                <Image style={{ width: 60, height: 60, borderRadius: 5 }} source={{ uri: props.data.image }} />
                <View style={{ flex: 1, marginLeft: 10, marginRight: 10 }}>
                    <Text style={{ fontWeight: 'bold', fontSize: 14 }}>{props.data.title}</Text>
                    
                    <View style={{ flexDirection: 'row', alignItems: 'center', marginTop: 5 }}>
                        <Clock style={{ marginRight: 5 }} width={13} height={13} />
                        <Text style={{ fontSize: 10, color: '#908A8A' }}>{props.data.date}</Text>
                    </View>
                </View>
            </View>
        </TouchableOpacity>
    )
}

const styles = StyleSheet.create({
    cardView: {
        flex: 1,
        width: width - 40,
        backgroundColor: 'white',
        marginTop: 10,
        marginBottom: 5,
        marginLeft: 20,
        marginRight: 20,
        borderRadius: 10,
        shadowColor: '#000',
        shadowOffset: { width: 0.5, height: 0.5 },
        shadowOpacity: 0.5,
        shadowRadius: 3,
        elevation: 3,
        padding: 20
    },
})

export default NewsItem