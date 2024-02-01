const longitud = require('../longitud');

describe('Test per a longitud de una cadena', () => {
    test('La longitud de la cadena es correcta', () => {
        expect(longitud('hola soy adri')).toBe(13);
    });
    test('La longitud de la cadena no es correcta', () => {
        expect(longitud('hola soy adri')).not.toBe(5);
    });
});