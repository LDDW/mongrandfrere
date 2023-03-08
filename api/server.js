//DEPENDENCIES
import express from "express";
import cors from "cors";
import cookieParser from "cookie-parser";
//IMPORTS ROUTES FILES
import userRoute from "./user/route.js";
import adminAuth from "./admin/auth.js";
import session from "express-session";


const app = express();
const admin = express();
app.use(express.json());
app.use(cookieParser());
app.use(session({
    resave: false,
    saveUninitialized: true,
    secret: "sessionss",
    cookie: { secure: true }
}));
app.use(cors({ credentials:true, origin:'http://localhost:3000' }));

// USERS ROUTES 
    // AUTH ROUTES 
    app.use("/api", userRoute);

// ROUTES ADMIN
    // ROUTES AUTH
    admin.use("/admin/auth", adminAuth);

app.listen(3003, () => {
    console.log('Connected server');
})
