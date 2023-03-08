import axios from "axios";
import { useEffect, useState } from "react";
import LayoutsClient from "../layouts/LayoutsClient";
import {Button, Label, TextInput,} from "flowbite-react"


export default function Account() {

    const [user, setUser] = useState({})

    const getUser = () => {
        axios.get("http://localhost:3003/api/account", {
                withCredentials: true
        })
        .then((response) => {
            setUser(response.data);
            console.log(response.data);
        })
    }

    useEffect(() => getUser(), []); 

    return(
        <LayoutsClient>
            <h1 className="font-bold text-4xl mb-6">Mon compte</h1>
            <div className="grid grid-cols-12 gap-6">

                {/* form for change data */}
                <form className="bg-white p-4 rounded-lg col-span-6 shadow-sm">
                    <h5 className="text-xl mb-4 font-semibold tracking-tight text-gray-900 dark:text-white">Mes informations personnelles</h5>
                    <div className="grid grid-cols-12 gap-4">
                        <div className="col-span-6">
                            <Label htmlFor="email1" value="Nom" className="mb-2 block" />
                            <TextInput id="email1" type="text" placeholder="name@flowbite.com" required={true} value={user.lastname} />
                        </div>
                        <div className="col-span-6">
                            <Label htmlFor="email1" value="Prénom" className="mb-2 block" />
                            <TextInput id="email1" type="email" placeholder="name@flowbite.com" required={true} />
                        </div>
                        <div className="col-span-full">
                            <Label htmlFor="email1" value="e-mail" className="mb-2 block" />
                            <TextInput id="email1" type="email" placeholder="name@flowbite.com" required={true} />
                        </div>
                        <div className="col-span-full">
                            <Label htmlFor="email1" value="Téléphone" className="mb-2 block" />
                            <TextInput id="email1" type="email" placeholder="name@flowbite.com" required={true} />
                        </div>
                    </div>
                    <Button className="mt-4">Enregistrer</Button>
                </form>

                {/* form for reset password */}
                <form className="bg-white p-4 rounded-lg col-span-6 shadow-sm">
                    <h5 className="text-xl mb-4 font-semibold tracking-tight text-gray-900 dark:text-white">Changer de mot de passe</h5>
                    <div className="flex flex-col gap-4">
                        <div>
                            <Label htmlFor="email1" value="Your email" className="mb-2 block" />
                            <TextInput id="email1" type="email" placeholder="name@flowbite.com" required={true} />
                        </div>
                        <div>
                            <Label htmlFor="email1" value="Your email" className="mb-2 block" />
                            <TextInput id="email1" type="email" placeholder="name@flowbite.com" required={true} />
                        </div>
                        <div>
                            <Label htmlFor="email1" value="Your email" className="mb-2 block" />
                            <TextInput id="email1" type="email" placeholder="name@flowbite.com" required={true} />
                        </div>
                    </div>
                    <Button className="mt-4">Changer le mot de passe</Button>
                </form>

                {/* form to reset password */}
                <form className="bg-white p-4 rounded-lg col-span-6 shadow-sm">
                    <h5 className="text-xl mb-4 font-semibold tracking-tight text-gray-900 dark:text-white">Supprimer mon compte</h5>
                    <p>Lorsque vous supprimez votre compte, toutes les données et les achats associés à celui-ci seront également supprimés.</p>
                    <Button className="mt-4 bg-red-500 hover:bg-red-600">Supprimer mon compte</Button>
                </form>

            </div>
            
        </LayoutsClient>
    );
}