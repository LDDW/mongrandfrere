import { useContext } from "react";
import { Link } from "react-router-dom"
import { AuthContext } from "../context/AuthContext";

export default function Navbar(){

    const { authUserCookie, logout } = useContext(AuthContext);

    return (
        <>
        <header>
            <nav>
                <ul>
                    <li><Link to="/">Accueil</Link></li>
                    <li>
                        <Link to="/formations">Nos services</Link>
                        <ul>
                            <li><Link to="/formations">Ma formation 100% gratuite</Link></li>
                            <li><Link to="/formations">Formations</Link></li>
                        </ul>
                    </li>
                    <li><Link to="/actualités">Actualités</Link></li>
                    <li><Link to="/qui-sommes-nous">Qui sommes-nous</Link></li>
                    <li>    
                        {authUserCookie ? (
                            <span onClick={logout}>Logout</span>
                        ) : (
                            <Link className="link" to="/login">
                                Login
                            </Link>
                        )}
                    </li>
                </ul>
            </nav>
        </header>
        </> 
    )
}