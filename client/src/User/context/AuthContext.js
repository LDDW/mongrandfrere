import axios from "axios";
import { createContext, useEffect, useState } from "react";

export const AuthContext = createContext()

export const AuthContextProvider = ({ children }) => {

    const [authUserCookie, setAuthUserCoookie] = useState(false);

    useEffect(() => {
        document.cookie.split(';').forEach(cookie => {
            const [name, value] = cookie.split('=');
            if (name.trim() === 'usertoken') {
                setAuthUserCoookie(true)
            } 
        })
    }, [authUserCookie]);

    const login = async (inputs) => {
        const res = await axios.post("http://localhost:3003/api/auth/login", inputs, {
            withCredentials: true
        });
        if(res.status === 200){
            setAuthUserCoookie(true)
        }
    };

    const logout = async () => {
        await axios.post("http://localhost:3003/api/auth/logout", '', {
            withCredentials: true
        });
        setAuthUserCoookie(false);
    };

    return (
        <AuthContext.Provider value={{authUserCookie, login, logout }}>
            {children}
        </AuthContext.Provider>
    );
}