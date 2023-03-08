import { useEffect } from "react";
import LayoutsClient from "../layouts/LayoutsClient";
import axios from "axios";


export default function Account() {

    useEffect(() => {
        try {
            const res = axios.get("http://localhost:3003/api/account", {
                withCredentials: true
            });
            console.log(res);
        } catch (error) {
            console.log(error);
        }
    })

    return(
        <LayoutsClient>
            <h1 className="font-bold text-4xl mb-6">Mon compte</h1>
            <div className="grid grid-cols-12 gap-6">
                <div className="bg-white p-4 rounded-lg col-span-6"></div>
            </div>
        </LayoutsClient>
    );
}