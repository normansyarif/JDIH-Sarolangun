import React, { useState, useEffect, useRef } from 'react'
import { Linking, StyleSheet, View, BackHandler, ActivityIndicator, TouchableOpacity, Text } from 'react-native'
import { useNavigation, useRoute } from '@react-navigation/native';

import { WebView } from 'react-native-webview';

const Browser = (props) => {
    const route = useRoute();
    const [loading, setLoading] = useState(true);
    const navigation = useNavigation();
    const { headerTitle, url } = route.params;

    const [canGoBack, setCanGoBack] = useState(false)
    const webviewRef = useRef(null);

    // didMount
    useEffect(() => {
        navigation.setOptions({
            headerTitle: headerTitle
        });

    }, []);

    // didUpdate
    useEffect(() => {
        BackHandler.addEventListener('hardwareBackPress', () => {
            if (canGoBack) {
                webviewRef.current.goBack();
            }
            else {
                navigation.goBack()
            }
            return true;
        });
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
                javaScriptEnabled={true}
                domStorageEnabled={true}
                allowFileAccess={true}
                allowUniversalAccessFromFileURLs={true}
                allowingReadAccessToURL={true}
                startInLoadingState
                originWhitelist={['*']}
                mixedContentMode={'always'}
                source={{ uri: url }}
                onShouldStartLoadWithRequest={event => {
                    if (event.url.includes('download=true')) {
                        Linking.openURL(event.url)
                        return false
                    }
                    return true
                }}
                />

            { loading && (
                <ActivityIndicator style={styles.loading} size="large" color="#39C4C1" />
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