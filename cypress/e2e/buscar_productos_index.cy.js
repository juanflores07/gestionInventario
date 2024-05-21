describe('Buscar producto', () => {
  beforeEach(() => {
    cy.visit('http://gestioninventario/productos')
  })

  it('debería buscar un producto específico en la tabla', () => {
    // Escribir "Manguera" en el input de búsqueda
    cy.get('#tablaProductos_filter input').type('CAS-EMPR-0001')

    // Verificar que se muestran los resultados de búsqueda
    cy.get('#tablaProductos tbody tr').should('have.length', 1)

    // Verificar que el código del producto es correcto
    cy.get('#tablaProductos tbody tr td:nth-child(1)').should('contain', 'CAS-EMPR-0001')
  })
})