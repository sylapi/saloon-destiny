# Saloon Destiny

Saloon Destiny it's a package for communication with Destiny ERP.

## Installation

Use the composer to install package.

```bash
composer require sylapi/saloon-destiny
```

## Usage

```php
# initialize connection
$connector = new DestinyConnector(dstClientId: 123456, dstUser: 'myuser', dstPass: 'mypassword', basicAuthUser: '123456_shop', basicAuthPassword: 'myauthpassword');

# making request

$request = $connector->request(new GetGoodByIdRequest(id: 123456789));
$response = $request->send();
$arrayWithResponseData = $response->json();

# entities validation before send request

$good = new Good();
$good->setName('test');

//code below return true or false.
$good->validate();

//you can get validation errors as text or as array
if (!$buyer->validate()) {
    echo $buyer->getErrors($asText = true);

    $arrayOfErrors = $buyer->getErrors();
}
```

## Requests

### Goods

#### CreateGoodRequest 

```php
$good = new Good();

# Set all properties, for example name etc.
$good->setName('test');

# Validate and send request
if ($good->validate()) {
    $request = $connector->request(new CreateGoodRequest(good: $good));
    $response = $request->send();
    $arrayWithResponseData = $response->json();
} else {
    echo $good->getErrors($asText = true);
}
```
#### UpdateGoodRequest 
```php
$good = new Good();

# Set all properties, for example name etc.
$good->setName('test');

if ($good->validate()) {
    $goodId = 123456;
    $request = $connector->request(new UpdateGoodRequest(goodId: $goodId, good: $good));
    $response = $request->send();
    $arrayWithResponseData = $response->json();
} else {
    echo $good->getErrors($asText = true);
}
```

#### GetGoodByIdRequest 
```php
$request = $connector->request(new GetGoodByIdRequest(id: 123456789));
$response = $request->send();
$arrayWithResponseData = $response->json();
```

#### GetGoodRequest 
You can search good by many properties, for example code. Code below should return good with 'XYZ' code.
```php
$params = [
    'code' => 'XYZ'
];

$request = $connector->request(new GetGoodRequest(params: $params));
$response = $request->send();
$arrayWithResponseData = $response->json();
```

#### GetGoodsRequest 
```php
$fieldsYouWantToReceive = 'id,name,code,tot_price'
$request = $connector->request(new GetGoodsRequest(fields: $fieldsYouWantToReceive));
$response = $request->send();
$arrayWithResponseData = $response->json();
```

### GoodItems

#### CreateGoodItemRequest 

```php
$goodItem = new GoodItem();

# Set all properties, for example name etc.
$goodItem->setName('test');

# Validate and send request
if ($goodItem->validate()) {
    $request = $connector->request(new CreateGoodItemRequest(goodItem: $goodItem));
    $response = $request->send();
    $arrayWithResponseData = $response->json();
} else {
    echo $goodItem->getErrors($asText = true);
}
```
#### UpdateGoodItemRequest 
```php
$goodItem = new GoodItem();

# Set all properties, for example name etc.
$goodItem->setName('test');

if ($goodItem->validate()) {
    $goodItemId = 123456;
    $request = $connector->request(new UpdateGoodItemRequest(goodItemId: $goodItemId, goodItem: $goodItem));
    $response = $request->send();
    $arrayWithResponseData = $response->json();
} else {
    echo $goodItem->getErrors($asText = true);
}
```

#### GetGoodItemByIdRequest 
```php
$request = $connector->request(new GetGoodItemByIdRequest(id: 123456789));
$response = $request->send();
$arrayWithResponseData = $response->json();
```

#### GetGoodItemRequest 
You can search good item by many properties, for example code. Code below should return good with 'XYZ' code.
```php
$params = [
    'code' => 'XYZ'
];

$request = $connector->request(new GetGoodItemRequest(params: $params));
$response = $request->send();
$arrayWithResponseData = $response->json();
```

#### GetGoodItemsRequest 
```php
$fieldsYouWantToReceive = 'id,name,code,tot_price'
$request = $connector->request(new GetGoodItemsRequest(fields: $fieldsYouWantToReceive));
$response = $request->send();
$arrayWithResponseData = $response->json();
```

#### GetGoodItemsFromStorehouseRequest 
You can search good items from particular storehouse.
```php
$fieldsYouWantToReceive = 'id_storehouse_place,quantity,ean,quantity_avaible,id_good,good_item'
$storehouseId = 12345;
$request = $connector->request(new GetGoodItemsFromStorehouseRequest(storehouseId: $storehouseId, fields: $fieldsYouWantToReceive));
$response = $request->send();
$arrayWithResponseData = $response->json();
```

### Margins

#### GetMarginsRequest
```php
$dateFrom = new DateTime('01/01/2021');
$dateTo = new DateTime('01/02/2021');

$request = $connector->request(new GetMarginsRequest(dateFrom: $dateFrom, dateTo: $dateTo));
$response = $request->send();
$arrayWithResponseData = $response->json();
```

### Documents

#### CreateOrderRequest
```php
# You can see how to create order in tests/Documents/OrderTest.
$order = $this->createOrder();

if ($order->validate()) {
    $importDef = 123456;
    $request = $connector->request(new CreateOrderRequest(order: $order, importDef: $importDef));
    $response = $request->send();
    $arrayWithResponseData = $response->json();
}

```

#### CreateInvoiceRequest
```php
# You can see how to create invoice in tests/Documents/InvoiceTest.
$invoice = $this->createInvoice();

if ($invoice->validate()) {
    $importDef = 123456;
    $request = $connector->request(new CreateInvoiceRequest(invoice: $invoice, importDef: $importDef));
    $response = $request->send();
    $arrayWithResponseData = $response->json();
}
```
#### CreateRwPwRequest
```php
# You can see how to create rwpw in tests/Documents/RwPwTest.
$rwpw = $this->createRwPw();

if ($rwpw->validate()) {
    $request = $connector->request(new CreateRwPwRequest(rwpw: $rwpw));
    $response = $request->send();
    $arrayWithResponseData = $response->json();
}
```
