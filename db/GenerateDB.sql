insert into CUSTOMERS
values ("mario.rossi@unibo.it", "mario.rossi", "Z123", true),
	   ("virginia.trevisan@studio.unibo.it", "virginia.trevisan", "A123", false),
       ("fabiola.pisani@studio.unibo.it", "fabiola.pisani", "B123", false),
       ("giuseppe.fiorentini@studio.unibo.it", "giuseppe.fiorentini", "C123", false),
       ("valentino.russo@studio.unibo.it", "valentino.russo", "D123", false),
       ("rosanna.pagnotto@studio.unibo.it", "rosanna.pagnotto", "E123", false),
       ("isotta.sagese@studio.unibo.it", "isotta.sagese", "F123", false),
       ("viviano.colombo@studio.unibo.it", "viviano.colombo", "G123", false),
       ("elvio.ricci@studio.unibo.it", "elvio.ricci", "H123", false),
       ("emanuele.greco@studio.unibo.it", "emanuele.greco", "I123", false),
       ("simona.bergamaschi@studio.unibo.it", "simona.bergamaschi", "J123", false),
       ("caterina.marchesi@studio.unibo.it", "caterina.marchesi", "K123", false);

insert into PRODUCT_CATEGORIES
values ("C0", "Writing"),
       ("C1", "Stationery"),
       ("C2", "Notebooks"),
       ("C3", "Paper"),
       ("C4", "Binder"),
       ("C5", "Planner");

insert into PRODUCTS
values ("P0", "C0", "Pigment liner 308", "Staedtler", 2.9, 10, "Blistercard containing 1 pigment liner black, line width approx. 0.2 mm", null, null, null, null),
       ("P1", "C0", "Textsurfer classic 364", "Staedtler", 4.9, 7, "Highlighter with large ink reservoir for extra-long highlighting performance", null, null, null, null),
       ("P2", "C0", "Elance 421 45", "Staedtler", 1.9, 12, "Retractable ballpoint pen, longevity due to metal barrel and interchangable refill", null, null, null, null),
       ("P3", "C0", "Noris 120", "Staedtler", 1.5, 10, "Perfect graphite pencil in hexagonal shape - Made from Upcycled Wood", null, null, null, null),
       ("P4", "C0", "Lumocolor correctable 305", "Staedtler", 1.9, 7, "Non-permanent dry erase pen, for write-on films and other film surfaces", null, null, null, null),
       ("P5", "C0", "Tradition jumbo 1285", "Staedtler", 2.9, 8, "Perfect graphite pencil in triangular jumbo shape - Made from Upcycled Wood.", null, null, null, null),
       ("P6", "C0", "BIC Cristal Black Ballpoint", "BIC", 2.5, 6, "The classic BIC Cristal Original is the world's best-selling ballpoint pen and is available here in black ink", null, null, null, null),
       ("P7", "C0", "Pelikan Graphite Pencils", "Pelikan", 4.5, 6, "Set of 3 graphite pencils; made of wood from responsibly managed forests FSC non-toxic", null, null, null, null),
       ("P8", "C0", "Pilot Pen Frixion", "Pilot", 3, 5, " Erasable roller-ball pen. Stainless steel tip, 0.4 mm, replaceable lead.", null, null, null, null),
       ("P9", "C1", "Mars plastic 526", "Staedtler", 2.5, 12, "Eraser in premium quality, for first-class erasing performance.", null, null, null, null),
       ("P10", "C1", "Staedtler 511", "Staedtler", 3.5, 6, "Tub sharpener, for standard-sized blacklead pencils up to 8.2 mm", null, null, null, null),
       ("P11", "C1", "Noris 965", "Staedtler", 4.9, 10, "Blistercard containing scissors with 17 cm blade. Stainless steel, rounded blades.", null, null, null, null),
       ("P12", "C1", "Mars 562 PB", "Staedtler", 5, 7, "Plastic bag containing 1 ruler, length 30 cm.", null, null, null, null),
       ("P13", "C1", "FABER-CASTELL Rubber", "Faber Castell", 4.3, 6, "Plastic eraser for clean and soft erasing, in white colour. Erase without smudging.", null, null, null, null),
       ("P14", "C1", "MAPED Cosmic Scissors", "Maped", 5.3, 7, "A product that combines tradition and innovation, designed for both enthusiasts and professionals", null, null, null, null),
       ("P15", "C1", "Westcott Aluminium Ruler", "Westcott", 3.9, 5, "Aluminium ruler with bar for better handling, scale in cm and inches, 30 cm.", null, null, null, null),
       ("P16", "C1", "Casio Scientific Calculator", "Casio", 9.9, 5, " Battery Powered, Light Blue scientific calculator. Dual line LCD display, 12 digits per line.", null, null, null, null),
       ("P17", "C2", "Kangaro Notebook A6", "Kangaro", 2.9, 10, "Kraft notebook A6 96 sheets, 70 g, lined with elastic band and drawing ribbon.", null, null, null, null);

insert into PRODUCT_MODELS
values ("Yellow", "P1"),
       ("Green", "P1"),
       ("Pink", "P1");

insert into CARTS
values ("C0", "mario.rossi@unibo.it"),
       ("C1", "virginia.trevisan@studio.unibo.it"),
       ("C2", "fabiola.pisani@studio.unibo.it"),
       ("C3", "giuseppe.fiorentini@studio.unibo.it"),
       ("C4", "valentino.russo@studio.unibo.it"),
       ("C5", "rosanna.pagnotto@studio.unibo.it"),
       ("C6", "isotta.sagese@studio.unibo.it"),
       ("C7", "viviano.colombo@studio.unibo.it"),
       ("C8", "elvio.ricci@studio.unibo.it"),
       ("C9", "emanuele.greco@studio.unibo.it"),
       ("C10", "simona.bergamaschi@studio.unibo.it"),
       ("C11", "caterina.marchesi@studio.unibo.it");

insert into contains
values ("C0", "P0"),
       ("C0", "P1"),
       ("C1", "P2"),
       ("C2", "P3"),
       ("C3", "P4"),
       ("C4", "P5"),
       ("C5", "P6"),
       ("C6", "P7"),
       ("C7", "P8"),
       ("C8", "P9"),
       ("C9", "P10"),
       ("C10", "P11"),
       ("C11", "P12");

insert into ONLINE_ORDERS
values ("O0", "mario.rossi@unibo.it", 5.80, "Delivered", '2025-07-01', '2025-07-05'),
       ("O1", "virginia.trevisan@studio.unibo.it", 1.90, "Pending", '2025-07-02', '2025-07-06'),
       ("O2", "fabiola.pisani@studio.unibo.it", 3.40, "Shipped", '2025-07-03', '2025-07-07');

insert into includes
values ("O0", "P0"),
       ("O0", "P1"),
       ("O1", "P2"),
       ("O2", "P3"),
       ("O2", "P4");
