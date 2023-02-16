//DEPENDENCIES
import express from "express"
import cors from "cors";
//IMPORTS ROUTES FILES
import authRoutes from "./user/routes/auth.js"

const app = express();
app.use(express.json())
app.use(cors())

// USERS ROUTES 
    // AUTH ROUTES 
    app.use("/api/auth", authRoutes);


// ROUTES ADMIN
    // ROUTES AUTH
    app.use("/api/admin/auth", authRoutes);

app.listen(3001, () => {
    console.log('Connected');
})
