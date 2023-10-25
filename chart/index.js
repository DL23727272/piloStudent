JSC.chart('chartDiv', {
    type: 'column',
    series: [
        {
            name: 'Iphone',
            points: [
                { x: 'Iphone 11', y: 40 },
                { x: 'Iphone 12', y: 56 },
                { x: 'Iphone 15', y: 83 },
            ]
        },
        {
            name: 'Bag',
            points: [
                { x: 'Lacoste', y: 75 },
                { x: 'Mk', y: 85 },
                { x: 'Gucci', y: 90 },
            ]
        },
        {
            name: 'Shoes',
            points: [
                { x: 'Adidas', y: 86 },
                { x: 'Nike', y: 89 },
                { x: 'New Balance', y: 70 },
            ]
        }
    ]
});
