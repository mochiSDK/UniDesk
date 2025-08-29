insert into CUSTOMERS
values ("mario.rossi@unibo.it", "mario.rossi", "$2y$10$eC02nvRYoRZT1VVhdKEmgO698EztDvdx8DVC6/SuBKKjtVS1DGt3y", true),
	("virginia.trevisan@studio.unibo.it", "virginia.trevisan", "$2y$10$fRoBe1xEFMCt9Epu4b0dcOTa0dUs33nlQxVMmoielLs7ru8kkR6Re", false),
       ("fabiola.pisani@studio.unibo.it", "fabiola.pisani", "$2y$10$0XXYs0cBn0hYYTC8NVLf9ux10Q61WcGvF5LO8IYJAEgsqcYTiS04a", false),
       ("giuseppe.fiorentini@studio.unibo.it", "giuseppe.fiorentini", "$2y$10$2gLoy6PkLV9MJ8UeQpUdbee22wEhq2/dC39pyLOuWJbgABt5b8w76", false),
       ("valentino.russo@studio.unibo.it", "valentino.russo", "$2y$10$anOthmKj6AHg2hFMXqZ4BOZdLBIP/qpG2vk26oFNyFHXDdeE1ha36", false),
       ("rosanna.pagnotto@studio.unibo.it", "rosanna.pagnotto", "$2y$10$ZMqgj7EXbYA5ChT9aCxj9OyPqK6xv.rU/DdMHfowxd1liseYKLF4e", false),
       ("isotta.sagese@studio.unibo.it", "isotta.sagese", "$2y$10$jST7MHR6HDbrEnsKJlrpD.8MvjUBG//PvbT8JbvrPKo0xLvIQSALW", false),
       ("viviano.colombo@studio.unibo.it", "viviano.colombo", "$2y$10$I4CZK2tmQo/vvjXK8s4tVOMVRKbGn4dX0jFsxpAZNZrn31w7ztEnG", false),
       ("elvio.ricci@studio.unibo.it", "elvio.ricci", "$2y$10$RkpdJrpRPEbml01Lm/HxPebg/jJbyp6SNv8IoRY5jWZ027er00rJa", false),
       ("emanuele.greco@studio.unibo.it", "emanuele.greco", "$2y$10$W8R5Dk2XXz22z4YVfeblJOdN.wQ8nCU8wgbhiPZ5Q4sxnY1AsFR7y", false),
       ("simona.bergamaschi@studio.unibo.it", "simona.bergamaschi", "$2y$10$fHOQ4.vt4Rv2Un1TkITpFevPYhqJD5gI4iBTa464iFTxr7WBOulWe", false),
       ("caterina.marchesi@studio.unibo.it", "caterina.marchesi", "$2y$10$2gzZDAhw/j/lsYTKZhWR3OtzyhCGvbu0.mNPIPWx.TxE75HXnj0fS", false);

insert into PRODUCT_CATEGORIES
values ("C0", "Writing", "images/categories/writing.jpg"),
       ("C1", "Stationery", "images/categories/stationery.jpg"),
       ("C2", "Notebooks", "images/categories/notebook.jpg"),
       ("C3", "Paper", "images/categories/paper.jpg"),
       ("C4", "Binder", "images/categories/binder.jpg"),
       ("C5", "Planner", "images/categories/planner.jpg");

insert into PRODUCTS
values ("P0", "C0", "Pigment liner 308", "Staedtler", 2.9, 10, "Blistercard containing 1 pigment liner black, line width approx. 0.2 mm", null, null, null, "images/products/PigmLin308.jpg"),
       ("P1", "C0", "Textsurfer classic 364", "Staedtler", 4.9, 7, "Highlighter with large ink reservoir for extra-long highlighting performance", null, null, null, "images/products/Textsurfer364.jpg"),
       ("P2", "C0", "Elance 421 45", "Staedtler", 1.9, 12, "Retractable ballpoint pen, longevity due to metal barrel and interchangable refill", null, null, null, "images/products/Elance421_45.jpg"),
       ("P3", "C0", "Noris 120", "Staedtler", 1.5, 10, "Perfect graphite pencil in hexagonal shape - Made from Upcycled Wood", null, null, null, "images/products/Noris120.jpg"),
       ("P4", "C0", "Lumocolor correctable 305", "Staedtler", 1.9, 7, "Non-permanent dry erase pen, for write-on films and other film surfaces", 15, 2, 5, "images/products/LumocolorCorrectable305.jpg"),
       ("P5", "C0", "Tradition jumbo 1285", "Staedtler", 2.9, 8, "Perfect graphite pencil in triangular jumbo shape - Made from Upcycled Wood.", null, null, null, "images/products/TraditionJumbo1285.jpg"),
       ("P6", "C0", "BIC Cristal Black Ballpoint", "BIC", 2.5, 6, "The classic BIC Cristal Original is the world's best-selling ballpoint pen and is available here in black ink", null, null, null, "images/products/BIC_CristalBlackBallpoint.jpg"),
       ("P7", "C0", "Pelikan Graphite Pencils", "Pelikan", 4.5, 6, "Set of 3 graphite pencils; made of wood from responsibly managed forests FSC non-toxic", null, null, null, "images/products/PelikanGraphitePencils.jpg"),
       ("P8", "C0", "Pilot Pen Frixion", "Pilot", 3, 5, " Erasable roller-ball pen. Stainless steel tip, 0.4 mm, replaceable lead.", null, null, null, "images/products/PilotPenFrixion.jpg"),
       ("P9", "C1", "Mars plastic 526", "Staedtler", 2.5, 12, "Eraser in premium quality, for first-class erasing performance.", 6.5, 1.2, 2.2, "images/products/MarsPlastic526.jpg"),
       ("P10", "C1", "Staedtler 511", "Staedtler", 3.5, 6, "Tub sharpener, for standard-sized blacklead pencils up to 8.2 mm", null, null, null, "images/products/Staedtler511.jpg"),
       ("P11", "C1", "Noris 965", "Staedtler", 4.9, 10, "Blistercard containing scissors with 17 cm blade. Stainless steel, rounded blades.", 25, null, 11, "images/products/Noris965.jpg"),
       ("P12", "C1", "Mars 562 PB", "Staedtler", 5, 7, "Plastic bag containing 1 ruler, length 30 cm.", 15, null, null, "images/products/Mars562PB.jpg"),
       ("P13", "C1", "FABER-CASTELL Rubber", "Faber Castell", 4.3, 6, "Plastic eraser for clean and soft erasing, in white colour. Erase without smudging.", null, null, null, "images/products/FABER-CASTELLRubber.jpg"),
       ("P14", "C1", "MAPED Cosmic Scissors", "Maped", 5.3, 7, "A product that combines tradition and innovation, designed for both enthusiasts and professionals", 21.5, 1.2, 8.4, "images/products/MAPEDCosmicScissors.jpg"),
       ("P15", "C1", "Westcott Aluminium Ruler", "Westcott", 3.9, 5, "Aluminium ruler with bar for better handling, scale in cm and inches, 30 cm.", 30, null, null, "images/products/WestcottAluminiumRuler.jpg"),
       ("P16", "C1", "Casio Scientific Calculator", "Casio", 9.9, 5, " Battery Powered, Light Blue scientific calculator. Dual line LCD display, 12 digits per line.", 16.2, null, 7.7, "images/products/CasioScientificCalculator.jpg"),
       ("P17", "C2", "Kangaro Notebook A6", "Kangaro", 2.9, 10, "Kraft notebook A6 96 sheets, 70 g, lined with elastic band and drawing ribbon.", 14.8, 0.1, 10.5, "images/products/KangaroNotebookA6.jpg");

insert into PRODUCT_MODELS
values ("Yellow", "P1"),
       ("Green", "P1"),
       ("Pink", "P1");

insert into ONLINE_ORDERS
values ("O0", "mario.rossi@unibo.it", 7.80, "Delivered", '2025-07-01', '2025-07-05'),
       ("O1", "virginia.trevisan@studio.unibo.it", 4.80, "Pending", '2025-07-02', '2025-07-06'),
       ("O2", "fabiola.pisani@studio.unibo.it", 3.40, "Shipped", '2025-07-03', '2025-07-07'),
       ("O3", "giuseppe.fiorentini@studio.unibo.it", 7.80, "Pending", '2025-08-04', '2025-08-08');

insert into includes
values ("O0", "P0"),
       ("O0", "P1"),
       ("O1", "P0"),
       ("O1", "P2"),
       ("O2", "P3"),
       ("O2", "P4"),
       ("O3", "P0"),
       ("O3", "P1");
