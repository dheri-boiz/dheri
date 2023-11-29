import React, { useState } from 'react';

const ElectricityBillCalculator = () => {
  const [name, setName] = useState('');
  const [address, setAddress] = useState('');
  const [units, setUnits] = useState('');
  const [totalBill, setTotalBill] = useState(null);

  const calculateBill = () => {
    const unitCosts = {
      first10: 10,
      next50: 12,
      beyond60: 14
    };

    const consumedUnits = parseInt(units, 10);

    if (!isNaN(consumedUnits)) {
      let billAmount = 0;

      if (consumedUnits <= 10) {
        billAmount = consumedUnits * unitCosts.first10;
      } else if (consumedUnits <= 60) {
        billAmount = 10 * unitCosts.first10 + (consumedUnits - 10) * unitCosts.next50;
      } else {
        billAmount =
          10 * unitCosts.first10 + 50 * unitCosts.next50 + (consumedUnits - 60) * unitCosts.beyond60;
      }

      setTotalBill(billAmount);
    }
  };

  return (
    <div>
      <h2>Electricity Bill Calculator</h2>
      <form>
        <label>
          Name:
          <input type="text" value={name} onChange={(e) => setName(e.target.value)} />
        </label>
        <br />
        <label>
          Address:
          <input type="text" value={address} onChange={(e) => setAddress(e.target.value)} />
        </label>
        <br />
        <label>
          Enter Units Consumed:
          <input type="number" value={units} onChange={(e) => setUnits(e.target.value)} />
        </label>
        <br />
        <button type="button" onClick={calculateBill}>
          Calculate
        </button>
      </form>

      {totalBill !== null && (
        <div>
          <h3>Customer Details:</h3>
          <p><strong>Name:</strong> {name}</p>
          <p><strong>Address:</strong> {address}</p>

          <h3>Electricity Bill:</h3>
          <p><strong>Units Consumed:</strong> {units}</p>
          <p><strong>Total Bill Amount:</strong> {totalBill} rupees</p>
        </div>
      )}
    </div>
  );
};

export default ElectricityBillCalculator;
