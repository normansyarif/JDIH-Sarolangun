import * as React from 'react';
import { View, Text, Button } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';
import RNBootSplash from "react-native-bootsplash";

import Home from './src/screens/Home'
import Browser from './src/screens/Browser'
import NewsList from './src/screens/NewsList'

const Stack = createStackNavigator();

function App() {
    return (
        <NavigationContainer onReady={() => RNBootSplash.hide({ fade: true })}>
            <Stack.Navigator
                initialRouteName="Home"
                screenOptions={{
                    headerTitle: "JDIH Kabupaten X",
                    headerTitleAlign: "center",
                    headerStyle: {
                        backgroundColor: "#182533",
                    },
                    headerTintColor: '#fff',
                    headerTitleStyle: {
                        fontWeight: 'bold',
                    },
                    cardStyle: { backgroundColor: '#fff' }
                }}>
                <Stack.Screen 
                    options={{ 
                        headerShown: false
                    }} 
                    name="Home" 
                    component={Home} />
                <Stack.Screen name="Browser" component={Browser} />
                <Stack.Screen name="NewsList" component={NewsList} />
            </Stack.Navigator>
        </NavigationContainer>
    );
}

export default App;