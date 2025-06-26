const express = require("express");
const path = require("path");

const app = express();
const port = process.env.PORT || 3000;

app.use(express.static(path.join(__dirname, "..")));

app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "..", "index.html"));
});

app.listen(port, () => {
  console.log(`Servidor escuchando en http://localhost:${port}`);
});

const sqlite3 = require("sqlite3").verbose();
const db = new sqlite3.Database("../db/dataBase.db", (err) => {
  if (err) {
    console.error(err.message);
  }
  console.log("Conectado a la base de datos SQLite.");
});
