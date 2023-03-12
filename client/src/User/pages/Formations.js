import { Button } from "flowbite-react";
import LayoutsClient from "../layouts/LayoutsClient";

export default function Formations(){
    return (
        <LayoutsClient>
            <div className="shadow-sm rounded-md p-5 bg-white" id="">
                <h1>Accède à la formation 100% gratuite</h1>
                <Button gradientDuoTone="purpleToPink">J'accède à la formation</Button>
            </div>

            <section id="">
                <h2>Nos formations</h2>
            </section>

        </LayoutsClient>
    )
}