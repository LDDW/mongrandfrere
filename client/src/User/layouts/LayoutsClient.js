import Footer from "../components/Footer";
import Navbar from "../components/Navbar";

export default function LayoutsClient({children}) {
    return(
        <>
            <Navbar/>
            <main className="min-h-screen p-6 bg-gray-100">{children}</main>
            <Footer/>
        </>
    );
}