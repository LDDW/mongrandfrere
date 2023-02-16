//DEPENDENCIES
import express from "express"
import cors from "cors";
//IMPORTS ROUTES FILES
import userAuth from "./user/auth.js"

const app = express();
const admin = express();
app.use(express.json())
app.use(cors())

// USERS ROUTES 
    // AUTH ROUTES 
    app.use("/api/auth", userAuth);


// ROUTES ADMIN
    // ROUTES AUTH
    // admin.use("/admin/", authRoutes);

app.listen(3001, () => {
    console.log('Connected');
})
