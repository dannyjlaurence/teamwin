
package org.dannyjl;

import java.io.IOException;
import java.util.*;

import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.fs.Path;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Job;
import org.apache.hadoop.mapreduce.Mapper;
import org.apache.hadoop.mapreduce.Reducer;
import org.apache.hadoop.mapreduce.lib.input.FileInputFormat;
import org.apache.hadoop.mapreduce.lib.output.FileOutputFormat;
import org.apache.hadoop.util.GenericOptionsParser;
        
public class BubHub {
        
	  public static class TokenizerMapper 
      extends Mapper<Object, Text, Text, Text>{
   
   private Text word = new Text();
     
   public void map(Object key, Text value, Context context
                   ) throws IOException, InterruptedException {
     
	   ArrayList<String> thingsToThrowAway = new ArrayList<String>();
       
       thingsToThrowAway.add("i");
       thingsToThrowAway.add("for");
       thingsToThrowAway.add("me");
       thingsToThrowAway.add("we");
       thingsToThrowAway.add("you");
       thingsToThrowAway.add("she");
       thingsToThrowAway.add("her");
       thingsToThrowAway.add("his");
       thingsToThrowAway.add("he");
       thingsToThrowAway.add("him");
       thingsToThrowAway.add("it");
       thingsToThrowAway.add("\\");
       thingsToThrowAway.add("we");
       thingsToThrowAway.add("us");
       thingsToThrowAway.add("they");
       thingsToThrowAway.add("them");
       thingsToThrowAway.add("that");
       thingsToThrowAway.add("which");
       thingsToThrowAway.add("who");
       thingsToThrowAway.add("whom");
       thingsToThrowAway.add("whose");
       thingsToThrowAway.add("whichever");
       thingsToThrowAway.add("whoever");
       thingsToThrowAway.add("whomever");
       thingsToThrowAway.add("this");
       thingsToThrowAway.add("these");
       thingsToThrowAway.add("those");
       thingsToThrowAway.add("myself");
       thingsToThrowAway.add("ourselves");
       thingsToThrowAway.add("yourself");
       thingsToThrowAway.add("himself");
       thingsToThrowAway.add("herself");
       thingsToThrowAway.add("itself");
       thingsToThrowAway.add("themselves");
       thingsToThrowAway.add("what");
       thingsToThrowAway.add("my");
       thingsToThrowAway.add("your");
       thingsToThrowAway.add("our");
       thingsToThrowAway.add("their");
       thingsToThrowAway.add("theirs");
       thingsToThrowAway.add("mine");
       thingsToThrowAway.add("absentmindedly");
       thingsToThrowAway.add("adoringly");
       thingsToThrowAway.add("awkwardly");
       thingsToThrowAway.add("beautifully");
       thingsToThrowAway.add("briskly");
       thingsToThrowAway.add("brutally");
       thingsToThrowAway.add("carefully");
       thingsToThrowAway.add("competitively");
       thingsToThrowAway.add("eagerly");
       thingsToThrowAway.add("effortlessly");
       thingsToThrowAway.add("extravagantly");
       thingsToThrowAway.add("girlishly");
       thingsToThrowAway.add("gracefully");
       thingsToThrowAway.add("grimly");
       thingsToThrowAway.add("happily");
       thingsToThrowAway.add("halfheartedly");
       thingsToThrowAway.add("hungrily");
       thingsToThrowAway.add("lazily");
       thingsToThrowAway.add("lifelessly");
       thingsToThrowAway.add("loyally");
       thingsToThrowAway.add("quickly");
       thingsToThrowAway.add("quietly");
       thingsToThrowAway.add("quizically");
       thingsToThrowAway.add("really");
       thingsToThrowAway.add("recklessly");
       thingsToThrowAway.add("well");
       thingsToThrowAway.add("before");
       thingsToThrowAway.add("yesterday");
       thingsToThrowAway.add("tomorrow");
       thingsToThrowAway.add("daily");
       thingsToThrowAway.add("today");
       thingsToThrowAway.add("extremely");
       thingsToThrowAway.add("too");
       thingsToThrowAway.add("terribly");
       thingsToThrowAway.add("very");
       thingsToThrowAway.add("aboard");
       thingsToThrowAway.add("across");
       thingsToThrowAway.add("beyond");
       thingsToThrowAway.add("behind");
       thingsToThrowAway.add("except");
       thingsToThrowAway.add("like");
       thingsToThrowAway.add("of");
       thingsToThrowAway.add("out");
       thingsToThrowAway.add("opposite");
       thingsToThrowAway.add("than");
       thingsToThrowAway.add("to");
       thingsToThrowAway.add("with");
       thingsToThrowAway.add("and");
       thingsToThrowAway.add("or");
       thingsToThrowAway.add("both");
       thingsToThrowAway.add("lol");
       thingsToThrowAway.add("yolo");
       thingsToThrowAway.add("swag");
       thingsToThrowAway.add("fuck");
       thingsToThrowAway.add("fucking");
       thingsToThrowAway.add("damn");
       thingsToThrowAway.add("shit");
       thingsToThrowAway.add("may");
       thingsToThrowAway.add("twitter");
       thingsToThrowAway.add("text");
       thingsToThrowAway.add(".");
       thingsToThrowAway.add(":");
       thingsToThrowAway.add(":(");
       thingsToThrowAway.add(":)");
       thingsToThrowAway.add("<3");
       thingsToThrowAway.add("in");
       thingsToThrowAway.add("the");
       thingsToThrowAway.add("its");
       thingsToThrowAway.add("rt");
       thingsToThrowAway.add("after");
       thingsToThrowAway.add("super");
       thingsToThrowAway.add("many");
       thingsToThrowAway.add("how");
       thingsToThrowAway.add("on");
       thingsToThrowAway.add("as");
       thingsToThrowAway.add("is");
       thingsToThrowAway.add("a");
       thingsToThrowAway.add("no");
       thingsToThrowAway.add("use");
       thingsToThrowAway.add("has");
       thingsToThrowAway.add("[...]");
       thingsToThrowAway.add("it's");
       thingsToThrowAway.add("that's");
       thingsToThrowAway.add("-");

       String line = value.toString();
       StringTokenizer tokenizer = new StringTokenizer(line, "{\"}, \n\r\f");

       ArrayList<Text> keyWords = new ArrayList<Text>(); 
       while (tokenizer.hasMoreTokens()) {
         word.set(tokenizer.nextToken());

         if(word.toString().toLowerCase().equals("id_str")){
       	  word.set(tokenizer.nextToken());
       	  word.set(tokenizer.nextToken());
       	  break;
         }
         
   	  if(!thingsToThrowAway.contains(word.toString().toLowerCase()) && word.toString().charAt(0) != '@' && word.toString().charAt(0) != '#' ){
   		  if(word.toString().length() > 4 && !word.toString().substring(0, 4).toLowerCase().equals("http"))
   			  keyWords.add(new Text(word));
   		  else
   			  if(word.toString().length() <= 4 )
   				  keyWords.add(new Text(word));
   	  }
       }
       	  
       Iterator<Text> it = keyWords.iterator();
       while(it.hasNext()){
       	Text curr = it.next();
       	 context.write(word, curr);
       }
       
     }
   }
 
 
 public static class IntSumReducer 
      extends Reducer<Text,Text,Text,Text> {

   public void reduce(Text key, Iterable<Text> values, 
                      Context context
                      ) throws IOException, InterruptedException {
    
	   
	   	  String sb = new String();
	   	  Iterator<Text> it = values.iterator();
	   	  while (it.hasNext()) {
	   		  sb +=it.next();
	   		  if(it.hasNext())
	   			  sb += ",";
	   	  }
	   	  
	   	  context.write(new Text(key), new Text(sb));
   }
 }

 public static void main(String[] args) throws Exception {
   Configuration conf = new Configuration();
   String[] otherArgs = new GenericOptionsParser(conf, args).getRemainingArgs();
   if (otherArgs.length != 2) {
     System.err.println("Usage: wordcount <in> <out>");
     System.exit(2);
   }
   Job job = new Job(conf, "word count");
   job.setJarByClass(BubHub.class);
   job.setMapperClass(TokenizerMapper.class);
   job.setCombinerClass(IntSumReducer.class);
   job.setReducerClass(IntSumReducer.class);
   job.setOutputKeyClass(Text.class);
   job.setOutputValueClass(Text.class);
   FileInputFormat.addInputPath(job, new Path(otherArgs[0]));
   FileOutputFormat.setOutputPath(job, new Path(otherArgs[1]));
   System.exit(job.waitForCompletion(true) ? 0 : 1);
 }
        
}