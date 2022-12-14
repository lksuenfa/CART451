let natural = require('natural');
// console.log(natural);
let tokenizer = new natural.WordTokenizer();
// let stemmer = natural.PorterStemmer();
let tokens = tokenizer.tokenize("the lazy dog jumped over the high fence"); //could also be reading from a text
console.log(tokens);
console.log(natural.PorterStemmer.stem(tokens[7]));

let  sentenceSplitter = new natural.SentenceTokenizer()

let NGrams = natural.NGrams;
let bigrams = NGrams.ngrams("the lazy dog jumped over the high mountains", 5);
console.log(bigrams);

// let lexicon = new 
const language = "EN";
const defaultCategory = 'N';
const defaultCategoryCapitalized = 'NNP';

var lexicon = new natural.Lexicon(language, defaultCategory, defaultCategoryCapitalized);
var ruleSet = new natural.RuleSet('EN');
var tagger = new natural.BrillPOSTagger(lexicon, ruleSet);

console.log(tagger.tag(tokens));


var wordnet = new natural.WordNet();

wordnet.lookup('chair', function(results) {
    results.forEach(function(result) {
        console.log('------------------------------------');
        console.log(result.synsetOffset);
        console.log(result.pos);
        console.log(result.lemma);
        console.log(result.synonyms);
        console.log(result.pos);
        console.log(result.gloss);
    });
});