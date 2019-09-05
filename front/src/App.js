import React, { Component} from 'react';
import StoryDetails from './components/StoryDetails';
import About from './components/About';
import Footer from './components/Footer';

class App extends Component {

  constructor(props){
    super(props);
    this.state = {
      items: [],
      isLoaded: false,
    }
  }

  componentDidMount(){
    fetch('http://localhost/story/public/api/content/list')
    .then(res => res.json())
    .then(json => {
      this.setState({
        isLoaded: true,
        items: json,
      })
    });
  }

  render(){
    var { isLoaded, items } = this.state;
    console.log("ASAS:",items.data);
    if(!isLoaded) {
      return <div>Loading...</div>
    }
    else
    {
      return(
        <div className="App">
          
            {items.data.map(item => (
              <StoryDetails />
            ))};
          
          
          
          
          <Footer />
        </div>
      );
    }
  }

}

export default App;
