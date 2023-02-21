import express from "express";
import { register, login, logout } from "./controllers/auth.js";
import { verify } from "./controllers/email.js";

const router = express.Router();

// AUTH ROUTE
router.post('/auth/register', register);
router.post('/auth/login', login);
router.post('/auth/logout', logout);

// EMAIL ROUTE
router.post('/email/verify', verify);

export default router;