export const account = (req, res) => {
    console.log(req.cookies)

    res.status(200).json("ACCOUNT");
}