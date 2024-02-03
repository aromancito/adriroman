const invertirCadena = require('../invertirCadena');

test('Cadena invertida correctament', () => {
    const str = 'nairda aloh';
    expect(invertirCadena('hola adrian')).toBe(str);
});