let frutas = ["Manzana", "Banana", "Cereza"];
console.log("Inicial:", frutas);

frutas.push("Durazno");
console.log("push:", frutas);

let combinado = frutas.concat(["Mango", "Piña"]);
console.log("concat:", combinado);

let texto = combinado.join(", ");
console.log("join:", texto);

combinado.reverse();
console.log("reverse:", combinado);

combinado.unshift("Fresa");
console.log("unshift:", combinado);

let quitadoInicio = combinado.shift();
console.log("shift (eliminado):", quitadoInicio);
console.log("Array tras shift:", combinado);

let quitadoFinal = combinado.pop();
console.log("pop (eliminado):", quitadoFinal);
console.log("Array tras pop:", combinado);

let parte = combinado.slice(1, 4);
console.log("slice (1 a 3):", parte);

combinado.sort();
console.log("sort:", combinado);

combinado.splice(2, 0, "Kiwi", "Papaya");
console.log("splice (añadir Kiwi y Papaya en pos 2):", combinado);
