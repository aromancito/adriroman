const division = require('../division');

describe('Proves al fitxer division.test.js', () => {
    test('division de 10 entre 5 es igual a 2', () => {
        expect(division(10, 5)).toBe(2);
    });
    test('división de 0 entre 5 es igual a 0', () => {
        expect(division(0, 5)).toBe(0);
    });
    test('lanza un error cuando se divide por cero', () => {
        expect(() => division(10, 0)).toThrow('División por cero');
    });
});