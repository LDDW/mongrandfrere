import { FooterComponent } from "flowbite-react";
import { FooterBrand } from "flowbite-react/lib/esm/components/Footer/FooterBrand";
import { FooterCopyright } from "flowbite-react/lib/esm/components/Footer/FooterCopyright";
import { FooterLink } from "flowbite-react/lib/esm/components/Footer/FooterLink";
import { FooterLinkGroup } from "flowbite-react/lib/esm/components/Footer/FooterLinkGroup";
import { FooterTitle } from "flowbite-react/lib/esm/components/Footer/FooterTitle";
import Navbar from "../components/Navbar";

export default function LayoutsClient({children}) {
    return(
        <>
            <Navbar/>
            <main className="relative min-h-[80vh] p-5 bg-gray-100">{children}</main>
            <FooterComponent>
                <div className="w-full p-5 md:p-10">
                    <div className="grid w-full justify-between sm:flex sm:justify-between md:flex md:grid-cols-1">
                        <div>
                            <FooterBrand href="https://flowbite.com" src="" alt="Brand Logo" name="Mon grand frère"/>
                        </div>
                        <div className="grid grid-cols-2 gap-8 sm:mt-4 sm:grid-cols-3 sm:gap-6">
                            <div>
                                <FooterTitle title="about" />
                                <FooterLinkGroup col={true}>
                                    <FooterLink href="#">Flowbite</FooterLink>
                                    <FooterLink href="#">Tailwind CSS</FooterLink>
                                </FooterLinkGroup>
                            </div>
                            <div>
                                <FooterTitle title="Follow us" />
                                <FooterLinkGroup col={true}>
                                    <FooterLink href="#">Github</FooterLink>
                                    <FooterLink href="#">Discord</FooterLink>
                                </FooterLinkGroup>
                            </div>
                            <div>
                                <FooterTitle title="Legal" />
                                <FooterLinkGroup col={true}>
                                    <FooterLink href="#">Privacy Policy</FooterLink>
                                    <FooterLink href="#">Terms & Conditions</FooterLink>
                                </FooterLinkGroup>
                            </div>
                        </div>
                    </div>
                    <hr className="my-6 md:my-10"/>
                    <div className="w-full text-center mb-2">
                        <FooterCopyright href="#" by="Flowbite™" year={2022} />
                    </div>
                </div>
            </FooterComponent>
        </>
    );
}