//DEPENDENCIES
import express from "express";
import cors from "cors";
//IMPORTS ROUTES FILES
import userAuth from "./user/auth.js";
import adminAuth from "./admin/auth.js";

const app = express();
const admin = express();
app.use(express.json())
app.use(cors())

// USERS ROUTES 
    // AUTH ROUTES 
    app.use("/api/auth", userAuth);


// ROUTES ADMIN
    // ROUTES AUTH
    admin.use("/admin/auth", adminAuth);

app.listen(3001, () => {
    console.log('Connected');
})
