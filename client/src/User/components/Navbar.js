import { useContext } from "react";
import { Link } from "react-router-dom";
import { AuthContext } from "../context/AuthContext";

export default function Navbar(){

    const { authUserCookie, logout } = useContext(AuthContext);

    return (
        // ({ isActive }) => (isActive ? 'active' : 'inactive')
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
                            <div>
                                <Link to="/mon-compte">Mon compte</Link>
                                <span onClick={logout}>Déconnexion</span>
                            </div>
                        ) : (
                            <Link className="link" to="/connexion">
                                Login
                            </Link>
                        )}
                    </li>
                </ul>
            </nav>
        </header>
    )
}