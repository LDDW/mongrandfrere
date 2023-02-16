import { Link } from "react-router-dom"

export default function Navbar(){
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
                            <Link to="/login">Connexion</Link>
                            <Link to="/login">Inscription</Link>
                        </li>
                    </ul>
                </nav>
            </header>
        </> 
    )
}