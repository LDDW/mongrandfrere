import { useContext, useState } from "react";
import { Link } from "react-router-dom";
import { AuthContext } from "../context/AuthContext";

export default function Navbar(){

    const { authUserCookie, logout } = useContext(AuthContext);
    const [ dropdownNav , SetNavState] = useState(false);
    const [ dropdownAccount, SetAccountState] = useState(false);

    const handleNavStatus = () => {
        SetNavState(!dropdownNav);
        if(dropdownAccount === true ){
            SetAccountState(!dropdownAccount);
        }
    }

    const handleAccountStatus = () => {
        SetAccountState(!dropdownAccount);
        if(dropdownNav === true ){
            SetNavState(!dropdownNav);
        }
    }

    return (
        // ({ isActive }) => (isActive ? 'active' : 'inactive')
        <header className="w-full h-16 bg-gray-100">
            <div className="fixed top-0 z-50 w-full h-16 px-4 flex item-center justify-between bg-white shadow-sm">
                <div onClick={handleNavStatus} className="w-9 flex items-center outline-none select-none cursor-pointer">
                    { dropdownNav ? (
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-9 h-9">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    ) : (
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-9 h-9">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    )}
                </div>
                <div className="flex items-center">
                    <nav className={`fixed ${dropdownNav ? 'left-0' : '-left-full'} top-16 z-50 h-[calc(100%-64px)] w-full flex flex-col justify-between bg-gray-50 transition-all`}>
                        <ul className="p-5">
                            <li className="mb-5"><Link to="/">Accueil</Link></li>
                            <li className="mb-5">
                                <Link to="/formations">Nos services</Link>
                                <ul>
                                    <li><Link to="/formations">Ma formation 100% gratuite</Link></li>
                                    <li><Link to="/formations">Formations</Link></li>
                                </ul>
                            </li>
                            <li className="mb-5"><Link to="/actualités">Actualités</Link></li>
                            <li><Link to="/qui-sommes-nous">Qui sommes-nous</Link></li>
                        </ul>
                        {!authUserCookie &&
                            <div className="p-5">
                                <Link to="/inscription" className="w-full h-12 flex items-center justify-center mb-5 text-white bg-black">Inscription</Link>
                                <p className="text-center text-sm">Déjà un compte ? <Link to="/connexion" className="underline text-blue-500 font-medium">Connexion</Link></p>
                            </div>
                        }
                    </nav>
                    <div>
                        Brand
                    </div>
                </div>
                <div className="w-9 flex items-center cursor-pointer">
                    {authUserCookie && 
                        <div className="relative flex items-center justify-end">
                            <div className="cursor-pointer" onClick={handleAccountStatus}>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-9 h-9">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div className={`${dropdownAccount ? '' : 'hidden'} absolute top-16 z-50 flex flex-col bg-white shadow-sm`}>
                                <Link to="/mon-compte">Mon compte</Link>
                                <span onClick={logout}>Déconnexion</span>
                            </div>
                        </div>
                    }
                </div>
            </div>
        </header>
    )
}