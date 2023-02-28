import { Button, Dropdown, Navbar } from "flowbite-react/lib/esm/components";
import { DropdownItem } from "flowbite-react/lib/esm/components/Dropdown/DropdownItem";
import { NavbarLink } from "flowbite-react/lib/esm/components/Navbar/NavbarLink";
import { useContext } from "react";
import { Link } from "react-router-dom";
import { AuthContext } from "../context/AuthContext";

export default function Nav_Bar_Compo(){

    const { authUserCookie, logout } = useContext(AuthContext);

    return (

        <header>
            {/* <Navbar fluid={true} rounded={true}>
                <NavbarBrand></NavbarBrand>
                <NavbarCollapse>
                    <NavbarLink href="/" active={true}>Accueil</NavbarLink>
                    <NavbarLink href="/formations">Nos services</NavbarLink>
                    <Dropdown floatingArrow={true} arrowIcon={true} inline={true} dismissOnClick={false} label="Nos services">
                        
                    </Dropdown>
                    <NavbarLink href="/actualités">Actualités</NavbarLink>
                    <NavbarLink href="/qui-sommes-nous">Qui sommes-nous</NavbarLink>

                        {authUserCookie ? (
                            <span onClick={logout}>Logout</span>
                        ) : (
                            <NavbarLink href="/connexion"><Button>Connexion</Button></NavbarLink>
                        )}

                </NavbarCollapse>
            </Navbar> */}
            <Navbar fluid={true} rounded={true}>
                
                <Navbar.Brand href="https://flowbite.com/">
                    <img src="https://flowbite.com/docs/images/logo.svg" className="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                    <span className="self-center whitespace-nowrap text-xl font-semibold dark:text-white">Mon grand frère</span>
                </Navbar.Brand>

                <Navbar.Collapse>
                    <NavbarLink href="/" active={true}>Accueil</NavbarLink>
                    <div>
                        <Dropdown arrowIcon={true} inline={true} dismissOnClick={false} label="Nos services">
                            <DropdownItem>
                                <NavbarLink href="/formations">Ma formation 100% gratuite</NavbarLink>
                            </DropdownItem>
                            <DropdownItem>
                                <NavbarLink href="/formations">Nos Formations</NavbarLink>
                            </DropdownItem>
                        </Dropdown>
                    </div>
                    <NavbarLink href="/actualités">Actualités</NavbarLink>
                    <NavbarLink href="/qui-sommes-nous">Qui sommes-nous</NavbarLink>
                    <Navbar.Link href="/navbars">Contact</Navbar.Link>
                </Navbar.Collapse>
                {authUserCookie ? (
                    <Dropdown arrowIcon={false} inline={true} label="test">
                        <Dropdown.Header>
                            <span className="block truncate text-sm font-medium">Nom et prénom du compte</span>
                        </Dropdown.Header>
                        <DropdownItem>
                            <NavbarLink href="/dashboard">Mon compte</NavbarLink>
                        </DropdownItem>
                        <DropdownItem>
                            <div onClick={logout}>Déconnexion</div>
                        </DropdownItem>
                    </Dropdown>
                            // <span onClick={logout}>Logout</span>
                ) : (
                    <Link to="/connexion"><Button>Connexion</Button></Link>
                )}
            </Navbar>
        </header>

    )
}