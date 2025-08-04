create database UniDeskDB;
use UniDeskDB;


-- Tables Section
-- _____________ 

create table CARTS (
     CartId char(254) not null,
     Email char(254) not null,
     constraint ID_CART_ID primary key (CartId),
     constraint FKowns_ID unique (Email));

create table contains (
     CartId char(254) not null,
     ProductId char(254) not null,
     constraint ID_contains_ID primary key (ProductId, CartId));

create table CUSTOMERS (
     Email char(254) not null,
     Username char(254) not null,
     Password char(254) not null,
     IsVendor char not null,
     constraint ID_CUSTOMER_ID primary key (Email));

create table includes (
     OrderId char(254) not null,
     ProductId char(254) not null,
     constraint ID_includes_ID primary key (ProductId, OrderId));

create table ONLINE_ORDERS (
     OrderId char(254) not null,
     Email char(254) not null,
     Total decimal(4,2) not null,
     Status char(254) not null,
     PurchaseDate date not null,
     DeliveryDate date not null,
     constraint ID_ONLINE_ORDER_ID primary key (OrderId),
     constraint SID_ONLINE_ORDER_ID unique (Email, OrderId));

create table PRODUCTS (
     ProductId char(254) not null,
     CategoryId char(254) not null,
     Name char(254) not null,
     Brand char(254) not null,
     Price decimal(3,2) not null,
     Amount int not null,
     Description varchar(500),
     Length decimal(2,2),
     Height decimal(2,2),
     Width decimal(2,2),
     Picture char(254),
     constraint ID_PRODUCT_ID primary key (ProductId),
     constraint SID_PRODUCT_ID unique (CategoryId, ProductId));

create table PRODUCT_CATEGORIES (
     CategoryId char(254) not null,
     Name char(254) not null,
     constraint ID_PRODUCT_CATEGORY_ID primary key (CategoryId));

create table PRODUCT_MODELS (
     Name char(254) not null,
     ProductId char(254) not null,
     constraint ID_PRODUCT_MODEL_ID primary key (Name),
     constraint SID_PRODUCT_MODEL_ID unique (ProductId, Name));


-- Constraints Section
-- ___________________ 

-- Not implemented
-- alter table CARTS add constraint ID_CART_CHK
--     check(exists(select * from contains
--                  where contains.CartId = CartId)); 

alter table CARTS add constraint FKowns_FK
     foreign key (Email)
     references CUSTOMERS (Email);

alter table contains add constraint FKcon_PRO
     foreign key (ProductId)
     references PRODUCTS (ProductId);

alter table contains add constraint FKcon_CAR_FK
     foreign key (CartId)
     references CARTS (CartId);

-- Not implemented
-- alter table CUSTOMERS add constraint ID_CUSTOMER_CHK
--     check(exists(select * from CARTS
--                  where CARTS.Email = Email)); 

alter table includes add constraint FKinc_PRO
     foreign key (ProductId)
     references PRODUCTS (ProductId);

alter table includes add constraint FKinc_ONL_FK
     foreign key (OrderId)
     references ONLINE_ORDERS (OrderId);

-- Not implemented
-- alter table ONLINE_ORDERS add constraint ID_ONLINE_ORDER_CHK
--     check(exists(select * from includes
--                  where includes.OrderId = OrderId)); 

alter table ONLINE_ORDERS add constraint FKplaces
     foreign key (Email)
     references CUSTOMERS (Email);

alter table PRODUCTS add constraint FKbelongs
     foreign key (CategoryId)
     references PRODUCT_CATEGORIES (CategoryId);

alter table PRODUCT_MODELS add constraint FKspecifies
     foreign key (ProductId)
     references PRODUCTS (ProductId);


-- Index Section
-- _____________ 

create unique index ID_CART_IND
     on CARTS (CartId);

create unique index FKowns_IND
     on CARTS (Email);

create unique index ID_contains_IND
     on contains (ProductId, CartId);

create index FKcon_CAR_IND
     on contains (CartId);

create unique index ID_CUSTOMER_IND
     on CUSTOMERS (Email);

create unique index ID_includes_IND
     on includes (ProductId, OrderId);

create index FKinc_ONL_IND
     on includes (OrderId);

create unique index ID_ONLINE_ORDER_IND
     on ONLINE_ORDERS (OrderId);

create unique index SID_ONLINE_ORDER_IND
     on ONLINE_ORDERS (Email, OrderId);

create unique index ID_PRODUCT_IND
     on PRODUCTS (ProductId);

create unique index SID_PRODUCT_IND
     on PRODUCTS (CategoryId, ProductId);

create unique index ID_PRODUCT_CATEGORY_IND
     on PRODUCT_CATEGORIES (CategoryId);

create unique index ID_PRODUCT_MODEL_IND
     on PRODUCT_MODELS (Name);

create unique index SID_PRODUCT_MODEL_IND
     on PRODUCT_MODELS (ProductId, Name);

