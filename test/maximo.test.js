const maximo = require('../maximo');

test('Es troba el valor maxim correctament', () => {
    const array = [1, 3, 10, 7, 5];
    expect(maximo(array)).toBe(10);
});