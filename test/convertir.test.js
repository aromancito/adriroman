const convertirAEuros = require('../convertirAEuros');
const calcularCostoEnEuros = require('../calcularCostoEnEuros');

describe('Test para la conversión de dólares a euros y cálculo del costo total en euros', () => {
    test('Convertir correctamente de dólares a euros', () => {
        const dolares = 100;
        const enEuros = 92.54;
        expect(convertirAEuros(dolares)).toBeCloseTo(enEuros);
    });

    test('Calcular correctamente el costo total en euros', () => {
        const cantidad = 2;
        const precioEnDolares = 10;
        const costoTotal = 92.54 * cantidad;
        expect(calcularCostoEnEuros(cantidad, precioEnDolares)).toBeCloseTo(costoTotal);
    });
});