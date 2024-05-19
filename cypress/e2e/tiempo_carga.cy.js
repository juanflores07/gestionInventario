describe('Tiempo de carga de vista Productos', () => {
  it('Mide el tiempo de carga de la página', () => {
    // Registrar el tiempo antes de visitar la página
    const startTime = new Date().getTime();

    // Interceptar la solicitud que carga la página de productos
    cy.intercept('GET', '/productos').as('loadProductosPage');

    // Visitar la página de productos
    cy.visit('http://gestioninventario/productos');

    // Esperar a que la solicitud de carga de la página se complete
    cy.wait('@loadProductosPage').then((interception) => {
      // Registrar el tiempo después de que la página haya cargado
      const endTime = new Date().getTime();
      const loadTime = endTime - startTime;

      // Verificar el tiempo de carga
      cy.log(`Tiempo de carga de la página: ${loadTime} ms`);
      expect(loadTime).to.be.lessThan(500);
    });

    // Verificar que la tabla de productos esté presente en la página
    cy.get('#tablaProductos').should('exist');
  });
});
