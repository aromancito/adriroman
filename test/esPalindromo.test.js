const esPalindromo = require('../esPalindromo');

describe('Test para verificar palíndromos', () => {
    test('Verificar si una palabra es un palíndromo', () => {
        const palabra = 'oso';
        expect(esPalindromo(palabra)).toBe(true);
    });
    test('Verificar si una palabra no es un palíndromo', () => {
        const palabra = 'hola';
        expect(esPalindromo(palabra)).toBe(false);
    });
    test('Verificar frases con espacios y signos de puntuación', () => {
        const frase = 'Anita lava la tina.';
        expect(esPalindromo(frase)).toBe(true);
    });
    test('Verificar frases que no son palíndromos', () => {
        const frase = 'Hola a todos.';
        expect(esPalindromo(frase)).toBe(false);
    });
});
