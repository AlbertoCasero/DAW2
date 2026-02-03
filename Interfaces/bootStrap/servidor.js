// Importar el módulo http
const http = require("http");
// Definir el puerto en el que el servidor escuchará
const port = 3000;
// Crear el servidor
const server = http.createServer((req, res) => {
  // Configurar la cabecera de respuesta
  res.writeHead(200, { "Content-Type": "text/plain" });

  // Enviar una respuesta
  res.end("¡Hola, mundo desde Node.js!");
});
// Hacer que el servidor escuche en el puerto definido
server.listen(port, () => {
  console.log(`Servidor funcionando en http://localhost:${port}`);
});
