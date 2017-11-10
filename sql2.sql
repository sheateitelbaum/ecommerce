SELECT item,price,categories.category,sites.store FROM `items` join categories ON items.category= categories.cat_id JOIN sites
ON items.store = sites.store_id
SELECT category FROM categories
SELECT item,price,categories.category FROM items JOIN categories ON items.category = categories.cat_id
WHERE categories.category = 'shoes'
SELECT items.store,item,price,categories.category FROM items JOIN categories ON items.category = categories.cat_id
JOIN sites ON items.store = sites.store_id WHERE sites.store = 'clothing'