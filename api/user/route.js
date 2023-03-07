import express from "express";
import { register, login, logout } from "./controllers/auth.js";
import { account } from "./controllers/user.js";
import { verify } from "./controllers/email.js";

const router = express.Router();

// AUTH ROUTE
router.post('/auth/register', register);
router.post('/auth/login', login);
router.post('/auth/logout', logout);

// USER ROUTE
router.post('/account', account)

// EMAIL ROUTE
router.post('/email/verify', verify);

export default router;