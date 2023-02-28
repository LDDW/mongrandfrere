import Footer from "../components/Footer_Compo";
import Navbar from "../components/Nav_Bar_Compo";

export default function LayoutsClient({children}) {
    return(
        <>
            <Navbar/>
            <main className="min-h-screen">{children}</main>
            <Footer/>
        </>
    );
}