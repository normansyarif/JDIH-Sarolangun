import React, { useState, useEffect } from 'react'
import { View, Text, StyleSheet, Image, FlatList, Animated, TouchableOpacity } from 'react-native'
import { useNavigation, useRoute } from '@react-navigation/native';

const MenuItem = (props) => {
    const navigation = useNavigation();

    return (
        <View style={{ flex: 1, marginLeft: 10, marginRight: 10, alignItems: 'center' }}>
            <TouchableOpacity
                onPress={() => navigation.navigate("Browser", {
                    headerTitle: props.title,
                    url: props.url
                })}
                style={[styles.cardView, { backgroundColor: props.color, justifyContent: 'center' }]}>
                <props.logo width={45} height={45} />
            </TouchableOpacity>
            <Text style={styles.textView}>{props.title}</Text>
        </View>
    )
}

const styles = StyleSheet.create({
    textView: {
        textAlign: 'center',
        marginTop: 10,
        fontSize: 12
    },
    cardView: {
        alignItems: 'center',
        borderRadius: 20,
        shadowColor: "#000",
        elevation: 3,
        padding: 20,
        borderWidth: 0,
        height: 80,
        width: 80
    },
})

export default MenuItem