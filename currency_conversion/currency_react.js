import React, { useState } from 'react';
import './App.css';

const CurrencyConverter = () => {
  // State to manage the input value and converted amount
  const [dollars, setDollars] = useState('');
  const [rupees, setRupees] = useState('');

  // Fixed conversion rate (1 USD = 75 INR)
  const conversionRate = 75;

  // Function to handle input change
  const handleInputChange = (e) => {
    const value = e.target.value;
    setDollars(value);

    // Convert dollars to rupees and update the state
    const convertedRupees = value * conversionRate;
    setRupees(convertedRupees.toFixed(2));
  };

  return (
    <div>
      <h1>Currency Converter</h1>
      <label>
        Dollars:
        <input type="number" value={dollars} onChange={handleInputChange} />
      </label>
      <p>Conversion Rate: 1 USD = {conversionRate} INR</p>
      <h2>Converted Amount: {rupees} INR</h2>
    </div>
  );
};

function App() {
  return (
    <CurrencyConverter />
  );
}

export default App;
