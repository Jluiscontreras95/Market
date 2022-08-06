DELIMITER //
CREATE TRIGGER `tr_upStockCompra` AFTER INSERT ON `purchase_details` 
    FOR EACH ROW BEGIN 
    UPDATE products 
    SET stock = stock + NEW.quantity 
    WHERE products.id = NEW.product_id;
END; 
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tr_updStockCompraAnular` AFTER UPDATE ON `purchases`
    FOR EACH ROW BEGIN

            IF NEW.status = "VALID" THEN BEGIN

            UPDATE products p
            JOIN purchase_details di 
            ON di.product_id = p.id
            AND di.purchase_id = NEW.id
            SET p.stock = p.stock + di.quantity;
            END;
            END IF;

            IF NEW.status = "CANCELED" THEN BEGIN
            UPDATE products p
            JOIN purchase_details di 
            ON di.product_id = p.id
            AND di.purchase_id = NEW.id
            SET p.stock = p.stock - di.quantity;
            END;
            END IF;
END;
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `sale_details`
        FOR EACH ROW BEGIN
        UPDATE products 
        SET stock = stock - NEW.quantity
        WHERE products.id = NEW.product_id;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tr_updStockVentaAnular` AFTER UPDATE ON `sales`
    FOR EACH ROW BEGIN
    IF NEW.status = "VALID" THEN BEGIN
        UPDATE products p
        JOIN sale_details dv
        ON dv.product_id = p.id
        AND dv.sale_id = NEW.id
        SET p.stock = p.stock - dv.quantity;
    END;
    END IF;
    IF NEW.status = "CANCELED" THEN BEGIN
        UPDATE products p
        JOIN sale_details dv
        ON dv.product_id = p.id
        AND dv.sale_id = NEW.id
        SET p.stock = p.stock + dv.quantity;
    END;
    END IF;
END;
//
DELIMITER ; 