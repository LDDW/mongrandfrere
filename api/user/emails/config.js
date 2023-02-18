import nodemailer from "nodemailer";
import dotenv from "dotenv";

dotenv.config({ path: './.env' })

export const transport = nodemailer.createTransport({
    host: "sandbox.smtp.mailtrap.io",
    port: 2525,
    auth: {
        user: process.env.EMAIL_USERNAME,
        pass: process.env.EMAIL_PASSWORD
    }
});