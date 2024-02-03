const esPar = require('../esPar');

describe('Test comprovació de Paritat', () => {
    test('Comprovar si un nombre es parell:', () => {
        const num = 4;
        if (num % 2 === 0) {
            expect(esPar(num)).toBe(true);
        }
    });
    test('Comprovar si un nombre es imparell:', () => {
        const num = 9;
        if (num % 2 !== 0) {
            expect(esPar(num)).toBe(false);
        }
    });
    test('Comprovar que zero es parell:', () => {
        const num = 0;

        if (num % 2 === 0) {
            expect(esPar(num)).toBe(true);
        }
    });
});