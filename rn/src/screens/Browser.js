import React, { useState, useEffect, useRef } from 'react'
import { StyleSheet, View, BackHandler, ActivityIndicator, TouchableOpacity, Text } from 'react-native'
import { useNavigation, useRoute } from '@react-navigation/native';

import { WebView } from 'react-native-webview';

const Browser = (props) => {
    const route = useRoute();
    const [loading, setLoading] = useState(true);
    const navigation = useNavigation();
    const { headerTitle, url } = route.params;

    const [canGoBack, setCanGoBack] = useState(false)
    const webviewRef = useRef(null);

    useEffect(() => {
        navigation.setOptions({
            headerTitle: headerTitle
        });

    }, []);

    useEffect(() => {

        BackHandler.addEventListener('hardwareBackPress', () => {
            if (canGoBack) {
                webviewRef.current.goBack();
            }
            else {
                navigation.goBack(null)
            }
            return true;
        });

        return () => {
            BackHandler.addEventListener('hardwareBackPress', () => {
                if (canGoBack) {
                    webviewRef.current.goBack();
                }
                else {
                    navigation.goBack(null)
                }
                return true;
            });
        }
    }, [canGoBack]);

    return (
        <View style={{ flex: 1 }}>
            <WebView
                ref={webviewRef}
                onNavigationStateChange={navState => {
                    setCanGoBack(navState.canGoBack)
                }}
                onLoadStart={() => setLoading(false)}
                style={{ flex: 1 }}
                javaScriptEnabled
                domStorageEnabled
                allowFileAccessFromFileURLs
                startInLoadingState
                originWhitelist={['*']}
                mixedContentMode="compatibility"
                source={{ uri: url }} />

            { loading && (
                <ActivityIndicator style={styles.loading} size="large" color="#50CDFF" />
            )}
        </View>

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
    },
    tabBarContainer: {
        padding: 20,
        flexDirection: 'row',
        justifyContent: 'space-around',
        backgroundColor: '#b43757'
    },
    button: {
        color: 'white',
        fontSize: 24
    }
})

export default Browser;