import { useEffect } from "react";
import LayoutsClient from "../layouts/LayoutsClient";
import axios from "axios";


export default function Account() {

    useEffect(() => {
        try {
            const res = axios.post("http://localhost:3003/api/account", 'test', {
                withCredentials: true
            });
            console.log(res);
        } catch (error) {
            console.log(error);
        }
    })

    return(
        <LayoutsClient>
            <h1>Mon compte</h1>
        </LayoutsClient>
    );
}