import express from "express";
import { register, login, logout } from "./controllers/auth.js"

const router = express.Router();

// AUTH ROUTE
router.post('/auth/register', register);
router.post('/auth/login', login);
router.post('/auth/logout', logout);

// EMAIL ROUTE

export default router;